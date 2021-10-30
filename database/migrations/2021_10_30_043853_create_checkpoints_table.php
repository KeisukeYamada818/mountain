
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateCheckpointsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("checkpoints", function (Blueprint $table) {

						$table->increments('id');
						$table->integer('route_id')->nullable()->unsigned();
						$table->integer('order')->nullable(); //ルートの順序
						$table->text('detail')->nullable(); //説明
						$table->string('image')->nullable(); //画像
						$table->timestamps();
						$table->foreign("route_id")->references("id")->on("routes");



						// ----------------------------------------------------
						// -- SELECT [checkpoints]--
						// ----------------------------------------------------
						// $query = DB::table("checkpoints")
						// ->leftJoin("routes","routes.id", "=", "checkpoints.route_id")
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
                Schema::dropIfExists("checkpoints");
            }
        }
    