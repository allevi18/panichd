<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Add indicies for better performance.
 *
 * Class AddIndexes
 */
class AddIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('panichd_tickets', function (Blueprint $table) {
            $table->index('subject');
            $table->index('status_id');
            $table->index('priority_id');
            $table->index('user_id');
            $table->index('agent_id');
            $table->index('category_id');
            $table->index('completed_at');
        });

        Schema::table('panichd_comments', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('ticket_id');
        });

        Schema::table('panichd_settings', function (Blueprint $table) {
            $table->index('lang');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('panichd_tickets', function (Blueprint $table) {
            $table->dropIndex('panichd_subject_index');
            $table->dropIndex('panichd_status_id_index');
            $table->dropIndex('panichd_priority_id_index');
            $table->dropIndex('panichd_user_id_index');
            $table->dropIndex('panichd_agent_id_index');
            $table->dropIndex('panichd_category_id_index');
            $table->dropIndex('panichd_completed_at_index');
        });

        Schema::table('panichd_comments', function (Blueprint $table) {
            $table->dropIndex('panichd_comments_user_id_index');
            $table->dropIndex('panichd_comments_ticket_id_index');
        });

        Schema::table('panichd_settings', function (Blueprint $table) {
            $table->dropIndex('panichd_settings_lang_index');
            $table->dropIndex('panichd_settings_slug_index');
        });
    }
}
