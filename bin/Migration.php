<?php

namespace xerotic;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Migration extends AbstractMigration {

    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;

    /** @var \Illuminate\Database\Schema\Builder $capsule */
    public $schema;

    public function init(){
        $this->capsule = new Capsule();
        $this->capsule->addConnection([
            'driver' => DB_TYPE,
            'host' => DB_HOST,
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASS,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]);

        $this->capsule->setEventDispatcher(new Dispatcher(new Container));

        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();

    }

}