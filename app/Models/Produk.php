<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;

    /**
     * ambil semua data produk beserta sumarinya
     *
     * @return object
     */
    public function findProduk()
    {
        $sql = "select
        pp.produk_id ,
        p.nama as nama_produk,
        ps.stok as stok_sekarang,
        sum(pp.jumlah) as stok_terjual
        from \"Mst\".produk p join \"Mst\".produk_stok ps on p.produk_id = ps.produk_id
        left join \"Trx\".pesanan_produk pp on pp.produk_id = p.produk_id
        group  by pp.produk_id, p.nama, ps.stok ";

        return DB::select($sql);
    }
}
