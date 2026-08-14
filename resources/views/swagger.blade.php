<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDUSA API | {{ tenant('id') ?? 'API' }}</title>
    <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist@5/swagger-ui.css">
    <style>
        :root {
            --ink: #10243e;
            --navy: #062d5d;
            --blue: #0c63b8;
            --green: #147d64;
            --paper: #f4f7f9;
            --line: #d8e1e8;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            color: var(--ink);
            background:
                radial-gradient(circle at 10% 0%, rgba(12, 99, 184, .13), transparent 30rem),
                linear-gradient(180deg, #edf3f7 0, var(--paper) 32rem);
            font-family: "Trebuchet MS", "Segoe UI", sans-serif;
        }

        .medusa-header {
            padding: 22px clamp(18px, 5vw, 72px);
            color: white;
            background: linear-gradient(120deg, #041f42, var(--navy) 58%, #0b527c);
            border-bottom: 5px solid #e6b33d;
        }

        .medusa-header h1 { margin: 0 0 5px; font-size: clamp(24px, 4vw, 38px); }
        .medusa-header p { margin: 0; opacity: .78; }

        .tenant-badge {
            display: inline-block;
            margin-bottom: 12px;
            padding: 5px 10px;
            border: 1px solid rgba(255, 255, 255, .35);
            border-radius: 99px;
            font: 700 12px/1 monospace;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .auth-panel {
            display: grid;
            grid-template-columns: minmax(190px, 1fr) minmax(190px, 1fr) auto auto;
            gap: 12px;
            align-items: end;
            max-width: 1120px;
            margin: 20px auto 4px;
            padding: 18px;
            background: rgba(255, 255, 255, .94);
            border: 1px solid var(--line);
            border-radius: 12px;
            box-shadow: 0 12px 35px rgba(16, 36, 62, .09);
        }

        .field label { display: block; margin-bottom: 6px; font-size: 12px; font-weight: 700; }
        .field input {
            width: 100%;
            height: 40px;
            padding: 0 11px;
            border: 1px solid #b8c6d1;
            border-radius: 6px;
            background: white;
        }

        .auth-actions { display: flex; gap: 8px; }
        .auth-button {
            height: 40px;
            padding: 0 16px;
            border: 0;
            border-radius: 6px;
            color: white;
            background: var(--blue);
            font-weight: 700;
            cursor: pointer;
            white-space: nowrap;
        }
        .auth-button.secondary { background: #516579; }
        .auth-button:disabled { cursor: wait; opacity: .6; }

        .auth-status {
            grid-column: 1 / -1;
            min-height: 20px;
            margin: 0;
            color: #56697a;
            font-size: 13px;
        }
        .auth-status.success { color: var(--green); font-weight: 700; }
        .auth-status.error { color: #a62d35; font-weight: 700; }

        .remember { display: flex; align-items: center; gap: 6px; margin-top: 8px; font-size: 12px; }
        .topbar { display: none; }
        .swagger-ui .information-container { padding-bottom: 0; }

        @media (max-width: 820px) {
            .auth-panel { grid-template-columns: 1fr; margin: 14px; }
            .auth-status { grid-column: 1; }
            .auth-actions { flex-wrap: wrap; }
        }
    </style>
</head>
<body>
    <header class="medusa-header">
        <span class="tenant-badge">Tenant: {{ tenant('id') ?? 'central' }}</span>
        <h1>MEDUSA API</h1>
        <p>Documentación interactiva con autenticación JWT integrada.</p>
    </header>

    <form id="swagger-login" class="auth-panel">
        <div class="field">
            <label for="swagger-email">Correo</label>
            <input id="swagger-email" name="email" type="email" autocomplete="username" required>
            <label class="remember"><input id="swagger-remember" type="checkbox" checked> Mantener sesión</label>
        </div>
        <div class="field">
            <label for="swagger-password">Contraseña</label>
            <input id="swagger-password" name="password" type="password" autocomplete="current-password" required>
        </div>
        <div class="auth-actions">
            <button id="swagger-login-button" class="auth-button" type="submit">Ingresar y cargar JWT</button>
            <button id="swagger-refresh-button" class="auth-button secondary" type="button">Renovar JWT</button>
        </div>
        <button id="swagger-logout-button" class="auth-button secondary" type="button">Limpiar sesión</button>
        <p id="swagger-auth-status" class="auth-status">Abre esta página desde el dominio del tenant que deseas consultar.</p>
    </form>

    <div id="swagger-ui"></div>

    <script src="https://unpkg.com/swagger-ui-dist@5/swagger-ui-bundle.js"></script>
    <script>
        (() => {
            const apiBase = `${window.location.origin}/api/v1`;
            const tokenStorageKey = `medusa-swagger-auth:${window.location.host}`;
            const form = document.getElementById('swagger-login');
            const loginButton = document.getElementById('swagger-login-button');
            const refreshButton = document.getElementById('swagger-refresh-button');
            const logoutButton = document.getElementById('swagger-logout-button');
            const status = document.getElementById('swagger-auth-status');
            let refreshPromise = null;

            const readTokens = () => {
                try { return JSON.parse(localStorage.getItem(tokenStorageKey)) || {}; }
                catch (_) { return {}; }
            };

            const tokenExpiration = (token) => {
                try {
                    const payload = token.split('.')[1].replace(/-/g, '+').replace(/_/g, '/');
                    return JSON.parse(atob(payload)).exp || 0;
                } catch (_) { return 0; }
            };

            const showStatus = (message, type = '') => {
                status.textContent = message;
                status.className = `auth-status ${type}`;
            };

            const authorizeSwagger = (accessToken) => {
                if (accessToken && window.ui) {
                    window.ui.preauthorizeApiKey('bearerAuth', accessToken);
                }
            };

            const saveTokens = (payload) => {
                const data = payload?.data || payload || {};
                const current = readTokens();
                const tokens = {
                    accessToken: data.accessToken || current.accessToken,
                    refreshToken: data.refreshToken || current.refreshToken,
                    email: data.email || current.email,
                };

                if (!tokens.accessToken) return false;
                localStorage.setItem(tokenStorageKey, JSON.stringify(tokens));
                authorizeSwagger(tokens.accessToken);
                if (tokens.email) document.getElementById('swagger-email').value = tokens.email;
                showStatus(`JWT cargado para {{ tenant('id') ?? 'este tenant' }}.`, 'success');
                return true;
            };

            const parseResponse = async (response) => {
                const payload = await response.json().catch(() => ({}));
                if (!response.ok) {
                    throw new Error(payload.message || payload.status || 'No fue posible autenticar la solicitud.');
                }
                return payload;
            };

            const refreshAccessToken = async () => {
                const tokens = readTokens();
                if (!tokens.refreshToken) throw new Error('No hay refresh token. Inicia sesión nuevamente.');

                if (!refreshPromise) {
                    refreshPromise = fetch(`${apiBase}/auth/refresh`, {
                        method: 'POST',
                        headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${tokens.refreshToken}` },
                    }).then(parseResponse).then((payload) => {
                        saveTokens(payload);
                        return readTokens().accessToken;
                    }).finally(() => { refreshPromise = null; });
                }
                return refreshPromise;
            };

            form.addEventListener('submit', async (event) => {
                event.preventDefault();
                loginButton.disabled = true;
                showStatus('Autenticando contra el tenant actual...');
                try {
                    const response = await fetch(`${apiBase}/auth/login`, {
                        method: 'POST',
                        headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            email: document.getElementById('swagger-email').value,
                            password: document.getElementById('swagger-password').value,
                            remember: document.getElementById('swagger-remember').checked,
                        }),
                    });
                    const payload = await parseResponse(response);
                    if (!saveTokens(payload)) throw new Error('El login no retornó un accessToken.');
                    document.getElementById('swagger-password').value = '';
                } catch (error) {
                    showStatus(error.message, 'error');
                } finally {
                    loginButton.disabled = false;
                }
            });

            refreshButton.addEventListener('click', async () => {
                refreshButton.disabled = true;
                try { await refreshAccessToken(); }
                catch (error) { showStatus(error.message, 'error'); }
                finally { refreshButton.disabled = false; }
            });

            logoutButton.addEventListener('click', () => {
                localStorage.removeItem(tokenStorageKey);
                window.ui?.authActions?.logout(['bearerAuth']);
                showStatus('JWT eliminado de este navegador.');
            });

            window.ui = SwaggerUIBundle({
                url: `${apiBase}/docs/openapi.json`,
                dom_id: '#swagger-ui',
                deepLinking: true,
                presets: [SwaggerUIBundle.presets.apis],
                layout: 'BaseLayout',
                persistAuthorization: true,
                onComplete: () => {
                    const tokens = readTokens();
                    if (tokens.email) document.getElementById('swagger-email').value = tokens.email;
                    if (tokens.accessToken) {
                        authorizeSwagger(tokens.accessToken);
                        showStatus(`JWT restaurado para {{ tenant('id') ?? 'este tenant' }}.`, 'success');
                    }
                },
                requestInterceptor: async (request) => {
                    if (request.url.includes('/auth/login') || request.url.includes('/auth/refresh')) return request;
                    let tokens = readTokens();
                    if (tokens.accessToken && tokenExpiration(tokens.accessToken) <= Math.floor(Date.now() / 1000) + 30 && tokens.refreshToken) {
                        try { await refreshAccessToken(); } catch (_) {}
                        tokens = readTokens();
                    }
                    if (tokens.accessToken) request.headers.Authorization = `Bearer ${tokens.accessToken}`;
                    return request;
                },
                responseInterceptor: (response) => {
                    if ((response.url || '').includes('/auth/login') || (response.url || '').includes('/auth/refresh')) {
                        let payload = response.obj;
                        if (!payload && response.data) {
                            try { payload = JSON.parse(response.data); } catch (_) {}
                        }
                        if (response.status >= 200 && response.status < 300) saveTokens(payload);
                    }
                    return response;
                },
            });
        })();
    </script>
</body>
</html>
