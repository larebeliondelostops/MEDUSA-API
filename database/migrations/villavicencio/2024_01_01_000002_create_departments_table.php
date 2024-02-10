    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Connection name.
         *
         * @return string
         */
        protected $connection = 'villavicencio';

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('departments', function (Blueprint $table) {
                $table->id();
                $table->string('name');

                $table->uuid('coordinate_id');
                $table->foreign('coordinate_id')->references('id')->on('coordinates');

                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('departments');
        }
    };
