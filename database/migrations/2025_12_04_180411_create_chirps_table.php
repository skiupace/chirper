<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('chirps', function (Blueprint $table) {
      $table->id();
      /**
       * constrained means that it'll create a foreignId for the table or model 'id' columns,
       * and cascadeOnDelete means the when deleting a user all of it chirps will be deleted.
       */
      $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete(); // or $table->foreignIdFor(User::class)
      $table->string('message', 255);
      $table->timestamps();
    });
  }

  /** creating a chirp using the DB facade:
   * DB::table('chirps')->insert([
   *  'message'     => 'my first chirp in the db!',
   *  'created_at'  =>  now(),
   *  'updated_at'  =>  now(),
   * ]);
   *
   * and we could select them by using a RAW sql query
   * DB::select('SELECT * FROM chirps');
   *
   * or via:
   * DB::table('chirps')->get();
   */

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('chirps');
  }
};
