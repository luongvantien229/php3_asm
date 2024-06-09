<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable()->comment('Địa chỉ');

            $table->string('number')->nullable()->comment('Điện thoại');

            $table->string('img')->nullable()->comment('Địa chỉ file hình');

            $table->boolean('role')->default(0)->comment('0 là bình thường, 1 là admin');
        });
        Schema::create('card', function (Blueprint $table) {
            
            $table->id();
            
            $table->integer('id_user')->comment('');
            
            $table->datetime('date_purchase')->comment('Thời điểm mua hàng');
            
            $table->string('name_receiver')->comment('Họ tên người nhận');
            
            $table->string('number_receiver',100)->comment('Điện thoại người nhận hàng');
            
            $table->string('address_delivered',100)->comment('Địa chỉ giao hàng');
            
            $table->boolean('status')->default(0)->comment('Trạng thái đơn hàng');
            
            $table->timestamps();
            
            });
            
            Schema::create('cardDetail', function (Blueprint $table) {
            
            $table->id();
            
            $table->integer('id_card')->comment('Mã đơn hàng');
            
            $table->integer('id_product')->comment('Mã sản phẩm');
            
            $table->integer('quantity')->default(1)->comment('Số lượng mua');
            
            $table->integer('price')->comment('Giá mua sản phẩm');
            
            $table->timestamps();
            
            });
            
            Schema::create('comment', function (Blueprint $table) {
            
            $table->id();
            
            $table->integer('id_product')->comment('Mã sản phẩm');
            
            $table->integer('id_user')->comment('Người bình luận');
            
            $table->text('content')->comment('Nội dung bình luận');
            
            $table->datetime('date')->comment('Thời điểm bình luận');
            
            $table->boolean('hiddem')->default(0)->comment('0 là ẩn 1 là hiện');
            
            $table->timestamps();
            
            });
            Schema::create('partner', function (Blueprint $table) {
            
                $table->id();
                
                $table->string('img')->nullable();
                
                $table->integer('order')->default(0);
                
                $table->boolean('hidden')->default(0);
                
                $table->timestamps();
                
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card');

Schema::dropIfExists('cardDetail');

Schema::dropIfExists('comment');

Schema::dropIfExists('partner');
    }
};
