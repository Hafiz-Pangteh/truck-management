  <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postmen', function (Blueprint $table) {
            $table->increments('postman_id');
            $table->string('truck_number')->nullable();
            $table->foreign('truck_number')->references('truck_number')->on('trucks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('postman_number')->unique();
            $table->string('postman_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postmen');
    }
}
