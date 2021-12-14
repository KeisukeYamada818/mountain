
    <?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateRoutesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create("routes", function (Blueprint $table) {

                $table->increments('id');
                $table->string('name');
                $table->integer('mount_id')->nullable()->unsigned();
                $table->integer('level')->nullable(); //難易度
                $table->time('times')->nullable(); //所要時間
                $table->integer('diff')->nullable(); //標高差
                $table->text('detail')->nullable(); //ルートの説明
                $table->timestamps();
                $table->foreign("mount_id")->references("id")->on("mounts");



                // ----------------------------------------------------
                // -- SELECT [routes]--
                // ----------------------------------------------------
                // $query = DB::table("routes")
                // ->leftJoin("mounts","mounts.id", "=", "routes.mount_id")
                // ->get();
                // dd($query); //For checking



            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists("routes");
        }
    }
