<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailpeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpeminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignid('peminjaman_id')->constrained('peminjaman');
            $table->foreignid('user_id')->constrained('users');
            $table->foreignid('jurnal_id')->constrained('jurnal');
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->integer('qty');
            $table->enum('status', ['dipinjam', 'dikembalikan']);
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
        Schema::dropIfExists('detailpeminjaman');
    }
}
