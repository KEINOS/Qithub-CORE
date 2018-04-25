[![Build Status](https://travis-ci.org/Qithub-BOT/Qithub-CORE.svg?branch=master)](https://travis-ci.org/Qithub-BOT/Qithub-CORE)

## このリポジトリについて

このリポジトリは **Qithub コマンドを実行して結果を返す**だけの PHP スクリプトです。

Qithub コマンドの動作チェックおよび Qithub-API のエンジンとして使われます。

## Qithub-CORE の使い方

1. 準備中...

## ディレクトリ構成

```
Qithub-CORE/
	┣━ README.md （このファイル）
	┣━ .git/ （このリポジトリの git 情報）
	┣━ .gitignore/ （git 同期で除外するファイル／ディレクトリを指定）
	┣━ .travis.yum （Travis CI の設定ファイル）
	┣━ composer.json （PHPUnit インストール用 Composer 設定ファイル）
	┣━ composer.lock （検証時の Composer 環境再現ファイル）
	┣━ src/ （メインとなるソースコード）
	┃	┣━ index.php
	┃	┣━ Functions.php （ユーザ関数一覧）
	┃	┗━ Classes.php （クラス一覧）
	┗━ test/ （Travis CI で実行するテスト）
		┣━ FunctionsTest.php
		┗━ ClassesTest.php
```

## ローカルに開発とテスト環境を作る

1. このリポジトリを `fork` します。
1. `Fork` したリポジトリをローカルに `clone` します。
1. クローンしたリポジトリにカレントディレクトリを移します。
1. 自分の環境の PHP バージョンを確認します。
1. `.travis.yml` に自分の PHP バージョンを追記します。
1. `composer.lock` ファイルを削除します。（`$ rm composer.lock`）
1. `composer` コマンドが使えるのを確認します。（`$ composer --version`）
    - `composer.phar` をダウンロードして `$ php path/to/composer.phar --version` でも OK。
1. 開発環境をインストールします。
    - `$ composer install`
1. `vendor` ディレクトリが出来たのを確認し、PHPUnit のバージョンを確認します。
    - `$ vendor/bin/phpunit --version`

## テストを実行する

1. `tests` ディレクトリ内のテストを実行する。
    - `$ vendor/bin/phpunit tests`
    - 「OK, but incomplete, skipped, or risky tests!」と出れば OK。<br>記述中の「..I」は、３つのテストのうち２つがパスして１つをスキップしたことを意味します。

## 検証環境

以下の環境で動作した PHP スクリプトを Travis CI で PHPUnit テストを通します。

- macOS High Sierra(OSX 10.13.4)
    - PHP 7.1.14 (cli)

- PHPUnit v.5.7.27 via Composer
    - PHP 5.6, 7.0, 7.1 コンパチは PHPUnit 5 であるため
