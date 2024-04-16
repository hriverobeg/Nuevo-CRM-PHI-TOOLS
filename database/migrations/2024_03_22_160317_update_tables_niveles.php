<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        # add new nivel
        DB::statement('INSERT INTO nivel (id, nombre, created_at, updated_at)
        VALUES (3, "Usuario", NOW(), NOW())');

       # add all admins and clients to user
       DB::statement('INSERT INTO user (nivel_id, parent_user_id, nombre, email, password, telefono, empresa, created_at, updated_at, deleted_at)
           SELECT nivel_id, NULL as parent_user_id, nombre, email, password, telefono, empresa, created_at, updated_at, deleted_at
           FROM admin');


       # add all usuarios to user using
       # table admin has email and table email has the same email
         DB::statement('INSERT INTO user (nivel_id, parent_user_id, nombre, email, password, telefono, empresa, created_at, updated_at, deleted_at)
              SELECT 3 as nivel_id, (SELECT id FROM user WHERE email = a.email LIMIT 1) as parent_user_id,
              u.nombre, u.email, NULL, u.telefono, u.empresa, u.created_at, u.updated_at, u.deleted_at
              FROM usuario u
              LEFT JOIN admin a ON a.id = u.admin_id');
        //  DB::statement('INSERT INTO user (nivel_id, parent_user_id, nombre, email, telefono, empresa, direccion_empresa, giro_empresa, website_empresa, created_at, updated_at, deleted_at)
        //       SELECT 3 as nivel_id, admin_id as parent_user_id, nombre, email, telefono, empresa, direccion_empresa, giro_empresa, website_empresa, created_at, updated_at, deleted_at
        //       FROM usuario');

        # add new column from_user_id and foreign key to cotizacion with DB:statement
        DB::statement('ALTER TABLE cotizacion ADD COLUMN from_user_id BIGINT UNSIGNED AFTER id');
        DB::statement('ALTER TABLE cotizacion ADD CONSTRAINT cotizacion_from_user_id FOREIGN KEY (from_user_id) REFERENCES user(id)');

        # add new column to_user_id and foreign key to cotizacion with DB:statement
        DB::statement('ALTER TABLE cotizacion ADD COLUMN to_user_id BIGINT UNSIGNED AFTER from_user_id');
        DB::statement('ALTER TABLE cotizacion ADD CONSTRAINT cotizacion_to_user_id FOREIGN KEY (to_user_id) REFERENCES user(id)');

        # change all admin_id to from_user_id in cotizacion using
        # table admin has email and table email has the same email
        DB::statement('UPDATE cotizacion
            JOIN admin a ON a.id = cotizacion.admin_id
            SET from_user_id = (SELECT id FROM user WHERE email = a.email AND nivel_id in (1,2) LIMIT 1)
            WHERE cotizacion.admin_id IS NOT NULL');

        # change all cliente_id to to_user_id in cotizacion
        # using table cliente has email and table email has the same email
        DB::statement('UPDATE cotizacion
            JOIN admin a ON a.id = cotizacion.cliente_id
            SET to_user_id = (SELECT id FROM user WHERE email = a.email AND nivel_id = 2 LIMIT 1)
            WHERE cotizacion.cliente_id IS NOT NULL');

        # change all usuario_id to to_user_id in cotizacion
        # using table usuario has email and table email has the same email
        DB::statement('UPDATE cotizacion
            JOIN usuario u ON u.id = cotizacion.usuario_id
            SET to_user_id = (SELECT id FROM user WHERE email = u.email AND nivel_id = 3 LIMIT 1)
            WHERE cotizacion.usuario_id IS NOT NULL');

        # add new column user_id in notification
        DB::statement('ALTER TABLE notificacion ADD COLUMN user_id BIGINT UNSIGNED AFTER id');
        DB::statement('ALTER TABLE notificacion ADD CONSTRAINT notificacion_user_id FOREIGN KEY (user_id) REFERENCES user(id)');

        # change all admin_id to user_id in notificacion
        # using table admin has email and table email has the same email
        DB::statement('UPDATE notificacion
            JOIN admin a ON a.id = notificacion.admin_id
            SET user_id = (SELECT id FROM user WHERE email = a.email LIMIT 1)
            WHERE notificacion.admin_id IS NOT NULL');

        # copy all usuario_archivo to user_archivo using
        # table usuario has email and table email has the same email
        DB::statement('INSERT INTO user_archivo (user_id, nombre, tipo_archivo_id, created_at, updated_at)
            SELECT us.id as user_id, ua.nombre, ua.tipo_archivo_id, ua.created_at, ua.updated_at
            FROM usuario_archivo ua
            JOIN usuario u ON u.id = ua.usuario_id
            JOIN user us ON u.email = us.email');

        # null admin_id in cotizacion and notificacion table
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
