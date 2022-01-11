<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * ambil semua data pesanan
     *
     * @return object
     */
    public function findPesanan()
    {
        $sql = "select
        p.pesanan_id ,
        p.no_pesanan ,
        p.tgl_pesanan ,
        concat(u.nama_depan, ' ', u.nama_belakang) as nama_lengkap_user,
        sq.total as total_harga,
        sq.jumlah as jumlah_produk
        from
        \"Trx\".pesanan p join \"Usr\".user u on u.user_id = p.user_id
        join
        (
        select sum(pp.jumlah * p2.harga) as total, sum(pp.jumlah) as jumlah, pp.pesanan_id from \"Trx\".pesanan_produk pp
        join \"Mst\".produk p2 on p2.produk_id=pp.produk_id group by pp.pesanan_id
        ) as sq on sq.pesanan_id = p.pesanan_id ";
        return $queryBuilder = DB::select($sql);
        // $mapping = [];
        // foreach ($queryBuilder as $key => $value) {
        //     $mapping[] = [
        //         "pesanan_id" => $value->pesanan_id,
        //         "tgl_pesanan" => $value->tgl_pesanan,
        //         "pesanan_id" => $value->pesanan_id,
        //         "pesanan_id" => $value->pesanan_id,
        //         "pesanan_id" => $value->pesanan_id,
        //     ];
        // }

        // return $mapping;
    }
}
