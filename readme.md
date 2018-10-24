## Laravel PHP Framework for Bucket List

```
前提条件
* Virtual Box 5.2.14 (http://hackers.nexseed.net/curriculums/78)
* vagrant 2.1.2 (http://hackers.nexseed.net/curriculums/78)
* 仮想環境起動済
* FileZilla 3.37.3 (https://filezilla-project.org/)
* iTerm2 Build 3.2.0 (Mac) (http://hackers.nexseed.net/curriculums/192)
* Power Shell (Windows) (http://hackers.nexseed.net/curriculums/192)
* Laravel5.1 インストール済 (http://hackers.nexseed.net/curriculums/146)
* Learn SNS作成済 (http://hackers.nexseed.net/curriculums/143)
* GitHub アカウント (https://github.com/)
```
  
  
1. データベース作成
	* 仮想サーバーを起動し、`http://192.168.33.10/phpmyadmin`にアクセス
	* データベース名「bucket_list」
	* 照合順序「utf8_general_ci」

2. プロジェクトクローン
	* 本ページからクローン、`bucketList`にフォルダ名を変更し、仮想環境に転送

3. 開発環境設定
	* `cp .env.example .env`
		* ローカル環境に転送
	* `composer update`
	* `php artisan key:generate`
		* .envファイルにキーをコピペし、仮想環境に転送
	* `chmod -R 777 storage`
	* `chmod -R 777 bootstrap/cache`
	* `php artisan migrate`

