<!DOCTYPE html>
<!--
  Jan Chris Tacbianan
  IS218-102 - Spring 2015
  Program 2
-->
<html>
    <head>
        <title>
            IS 218 - Homework 3
        </title>
		<style>
		table, th, td {
			border: 1px solid black;
		}
		</style>
    </head>
    <body>
        <?php

        class DatabaseAccess {

            private $connection;

            public static function getInstance() {
                static $instance = null;
                if (null === $instance) {
                    $instance = new DatabaseAccess();
                    $instance->connect();
                }
                return $instance;
            }

            private function connect() {
                $this->connection = new PDO('mysql:host=' . Constants::$SQLHOST . ';dbname=' . Constants::$SQLDB, Constants::$SQLUSER, Constants::$SQLPASS);
            }

        }

        class Page {

            private $dbUtil;

            /**
             * Constructor
             * Constructs the essential components of the page.
             */
            public function __construct() {
                $this->dbUtil = DatabaseAccess::getInstance();
                echo '<h2>IS 218 Program 2</h2>';
            }

            /**
             * Destructor
             * Outputs the page onces the page object is disposed of.
             */
            public function __destruct() {
                if (!(isset($_GET["entry"]))) {
                    $this->menu();
                } else {
                    $id = $_GET["entry"];
                    $this->generateResult($id);
                }
            }

            public function menu() {
                echo <<< INS
                    <p>Click on the result you would like to access:</p>
                    <ul>
                        <li><a href='{$_SERVER['PHP_SELF']}?entry=1'>Colleges with the highest percentage of women students</a></li>
                        <li><a href='{$_SERVER['PHP_SELF']}?entry=2'>Colleges with the highest percentage of male students</a></li>
                        <li><a href='{$_SERVER['PHP_SELF']}?entry=3'>Colleges with the largest endowment overall</a></li>
                        <li><a href='{$_SERVER['PHP_SELF']}?entry=4'>Colleges with the largest enrollment of freshman</a></li>
                        <li><a href='{$_SERVER['PHP_SELF']}?entry=5'>Colleges with the highest revenue from tuition</a></li>
                        <li><a href='{$_SERVER['PHP_SELF']}?entry=6'>Colleges with the lowest non zero tuition revenue</a></li>
                        <li><b>Top 10 Colleges by region for:</b>
                            <ul>
                                <li><a href='{$_SERVER['PHP_SELF']}?entry=7'>Endowment</a></li>
                                <li><a href='{$_SERVER['PHP_SELF']}?entry=8'>Total Current Assets</a></li>
                                <li><a href='{$_SERVER['PHP_SELF']}?entry=9'>Total Current Liabilities</a></li>
                                <li><a href='{$_SERVER['PHP_SELF']}?entry=10'>Lowest Non-Zero Tuition</a></li>
                                <li><a href='{$_SERVER['PHP_SELF']}?entry=11'>Highest Tuition</a></li>
                            </ul>
                        </li>
                    </ul>
INS;
            }

            public function generateResult($num) {
                switch ($num) {
                    
                }
                echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Return to Menu</a>";
            }

        }

        class Constants {

            public static $SQLHOST = 'localhost';
            public static $SQLUSER = 'test';
            public static $SQLPASS = 'test';
            public static $SQLDB = 'colleges';

        }

        $page = new Page();
        ?>
    </body>
</html>