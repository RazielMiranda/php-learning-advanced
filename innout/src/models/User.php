 <?php
    class User extends Model
    {
        //Vai definir o meu array de objeto user baseado nessas colunas que eu passar
        //Essas colunas devem ser as mesmas do banco de dados
        protected static $tableName = 'users';
        protected static $columns = [
            'id',
            'name',
            'password',
            'email',
            'start_date',
            'end_date',
            'is_admin',
        ];
    }
