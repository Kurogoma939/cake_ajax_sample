## 動的セレクトボックスのロジックの解説
こちら、Qiitaに投稿したのでそちらを参考にしてください。 <br />
[Ajaxを用いて動的セレクトボックスを実装する](https://qiita.com/kurogoma939/items/ccd1fc9baa55642fe2a5)



## 使用バージョン等
PHP7, MySQL8, jQuery, CakePHP4
※ jQueryとCakePHPは作成時点での最新バージョンを利用しています。



## 検証環境
MAMPを利用しています。
`config/app_local.php`配下を以下のようにしてください。（抜粋） <br />
※ CakePHP4からapp.phpではなく、app_local.phpになりました。また、バージョン３ => 4は大幅に変更があったので
色々と注意が必要です・・・。

```
    'Datasources' => [
        'default' => [
            'host' => 'localhost',
            /*
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            'port' => '8889',
            // MAMPの環境に合わせる
            'username' => 'cake_autumn',
            'password' => 'cake_autumn',
            'database' => 'cake_autumn',
            /*
             * If not using the default 'public' schema with the PostgreSQL driver
             * set it here.
             */
            //'schema' => 'myapp',

            /*
             * You can use a DSN string to set the entire configuration
             */
            'url' => env('DATABASE_URL', null),
            // MAMPのMySQLを読み込ませる 
            'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock'
        ],
```

## 遊ぶ用のテストデータ
テストデータもとりあえず適当に用意しておきました。
`app/SQL`配下のSQLファイルをMAMPでインポートしてください。
