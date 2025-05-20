public function up()
{
    Schema::create('prodis', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('kode_prodi');
        $table->timestamps();
    });
}
