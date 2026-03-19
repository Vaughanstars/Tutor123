<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('parent_name')->after('last_name');
            $table->string('grade')->after('parent_name');
            $table->string('address')->after('grade');
            $table->string('medical_condition')->nullable()->after('address');
            $table->text('performance')->after('medical_condition');
            $table->json('schedule')->nullable()->after('performance');
            $table->boolean('terms')->default(false)->after('schedule');
            $table->enum('source', ['admin', 'website'])->default('website')->after('terms');
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'parent_name',
                'grade',
                'address',
                'medical_condition',
                'performance',
                'schedule',
                'terms',
                'source',
            ]);
        });
    }
};