
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateMountsImageTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("mounts_image", function (Blueprint $table) {

						$table->increments('id');
						$table->integer('mount_id')->nullable()->unsigned();
						$table->string('image')->nullable(); //山の画像
						$table->timestamps();
						$table->foreign("mount_id")->references("id")->on("mounts");



						// ----------------------------------------------------
						// -- SELECT [mounts_image]--
						// ----------------------------------------------------
						// $query = DB::table("mounts_image")
						// ->leftJoin("mounts","mounts.id", "=", "mounts_image.mount_id")
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
                Schema::dropIfExists("mounts_image");
            }
        }
    