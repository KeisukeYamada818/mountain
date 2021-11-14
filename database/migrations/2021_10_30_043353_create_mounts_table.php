
    <?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateMountsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create("mounts", function (Blueprint $table) {

                $table->increments('id');
                $table->string('name', 50)->nullable(); //山の名前
                $table->integer('high')->nullable();
                $table->integer('famous')->nullable(); //おすすめ
                $table->integer('area_id')->nullable(); //地方
                $table->timestamps(); //登録日、更新日



                // ----------------------------------------------------
                // -- SELECT [mounts]--
                // ----------------------------------------------------
                // $query = DB::table("mounts")
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
            Schema::dropIfExists("mounts");
        }
    }
