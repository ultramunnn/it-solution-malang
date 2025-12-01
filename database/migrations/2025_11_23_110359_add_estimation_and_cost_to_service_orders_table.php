<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('service_orders', function (Blueprint $table) {
            // Tanggal estimasi selesai
            $table->date('estimated_finish_date')->nullable()->after('status');
            $table->decimal('additional_cost', 10, 2)->default(0)->after('estimated_finish_date');
        });
    }

    public function down(): void {
        Schema::table('service_orders', function (Blueprint $table) {
            $table->dropColumn(['estimated_finish_date', 'additional_cost']);
        });
    }
};

