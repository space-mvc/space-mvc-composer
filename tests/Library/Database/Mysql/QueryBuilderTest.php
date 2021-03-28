<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class QueryBuilderTest
 */
class QueryBuilderTest extends BaseTest
{
    /**
     * testQueryBuilderClass
     */
    public function testQueryBuilderClass() : void
    {
        $queryBuilder = $this->app->getDb();
        $this->assertEquals(get_class($queryBuilder), 'SpaceMvc\Framework\Library\Database\Mysql\QueryBuilder');
    }

    /**
     * testQueryBuilderSelect
     */
    public function testQueryBuilderSelect() : void
    {
        $queryBuilder = $this->app->getDb();
        $this->assertEquals(get_class($queryBuilder->select('users')), 'SpaceMvc\Framework\Library\Database\Mysql\QueryBuilder');
        $this->assertEquals($queryBuilder->getQuery(), 'SELECT * FROM users');
    }

    /**
     * testQueryBuilderSelectWithFields
     */
    public function testQueryBuilderSelectWithFields() : void
    {
        $queryBuilder = $this->app->getDb();
        $this->assertEquals(get_class($queryBuilder->select('users', ['id', 'first_name', 'last_name'])), 'SpaceMvc\Framework\Library\Database\Mysql\QueryBuilder');
        $this->assertEquals($queryBuilder->getQuery(), 'SELECT id, first_name, last_name FROM users');
    }

    /**
     * testQueryBuilderSelectWhere
     */
    public function testQueryBuilderSelectWhere() : void
    {
        $queryBuilder = $this->app->getDb();
        $this->assertEquals(get_class($queryBuilder->select('users')->where(['first_name' => 'space-mvc', 'last_name' => 'space-mvc'])), 'SpaceMvc\Framework\Library\Database\Mysql\QueryBuilder');
        $this->assertEquals($queryBuilder->getQuery(), "SELECT * FROM users WHERE first_name = 'space-mvc' AND last_name = 'space-mvc'");
    }

    /**
     * testQueryBuilderSelectWhereLike
     */
    public function testQueryBuilderSelectWhereLike() : void
    {
        $queryBuilder = $this->app->getDb();
        $this->assertEquals(get_class($queryBuilder->select('users')->whereLike(['first_name' => 'space-mvc', 'last_name' => 'space-mvc'])), 'SpaceMvc\Framework\Library\Database\Mysql\QueryBuilder');
        $this->assertEquals($queryBuilder->getQuery(), "SELECT * FROM users WHERE first_name LIKE '%space-mvc%' OR last_name LIKE '%space-mvc%'");
    }

    /**
     * testQueryBuilderSelectLimit
     */
    public function testQueryBuilderSelectLimit() : void
    {
        $queryBuilder = $this->app->getDb();
        $this->assertEquals(get_class($queryBuilder->select('users')->limit(10)), 'SpaceMvc\Framework\Library\Database\Mysql\QueryBuilder');
        $this->assertEquals($queryBuilder->getQuery(), "SELECT * FROM users LIMIT 10");
    }

    /**
     * testQueryBuilderSelectOffset
     */
    public function testQueryBuilderSelectOffset() : void
    {
        $queryBuilder = $this->app->getDb();
        $this->assertEquals(get_class($queryBuilder->select('users')->skip(10)), 'SpaceMvc\Framework\Library\Database\Mysql\QueryBuilder');
        $this->assertEquals($queryBuilder->getQuery(), "SELECT * FROM users OFFSET 10");
    }

    /**
     * testQueryBuilderSelectOrderBy
     */
    public function testQueryBuilderSelectOrderBy() : void
    {
        $queryBuilder = $this->app->getDb();
        $this->assertEquals(get_class($queryBuilder->select('users')->orderBy(['first_name' => 'ASC', 'last_name' => 'DESC'])), 'SpaceMvc\Framework\Library\Database\Mysql\QueryBuilder');
        $this->assertEquals($queryBuilder->getQuery(), "SELECT * FROM users ORDER BY first_name ASC, last_name DESC");
    }
}
