# feature-lab
用來實驗各種功能或是學習使用各種套件

## 實作功能
### [qr-scan](https://github.com/hank40413/feature-lab/wiki/qr-scan) 
利用 `instascan` 實作網頁版二維條碼掃描器  

## 使用套件
### composer
#### laravel/framework
版本：`6.12.0`  
使用人數比例最多的 `php` 框架，以 `Ruby on Rails` 框架啟發而建立  
連結：[官方文件](https://laravel.com/docs/6.x), [github](https://github.com/laravel/laravel)  

#### laravel/ui
版本：`1.2.0`  
`laravel` 附加套件，提供以簡便的方法新增前端套件，如 `bootstrap`, `Vue` 等  
透過 `composer` 管理安裝  
連結：[官方文件](https://laravel.com/docs/6.x/frontend)  

#### barryvdh/laravel-ide-helper
版本：`2.6.6`  
提供給 ide（如 `PhpStorm`），認識 `laravel` 其所使用的 `helper`, `Facades` 等的提示  
透過 `composer` 管理安裝  
連結：[github](https://github.com/barryvdh/laravel-ide-helper)  

### npm
#### schmich/instascan
版本：`1.0.0`  
使用 `javascript` 撰寫，可供完全前端使用的二維條碼掃描套件  
可透過 `npm` 管理安裝，或者可直接套用其提供的最小化 js 檔  
連結：[github](https://github.com/schmich/instascan)  

#### sweetalert2
版本：`9.8.2`  
使用 `javascript` 撰寫，提供前端各種美化後的彈出式視窗如 `alert`, `inputbox` 等  
透過 `npm` 管理安裝，使用時須在 `bootstrap.js` 中引入並且在須使用的頁面中引入其套件的 js 檔  
連結：[github](https://github.com/sweetalert2/sweetalert2)  

#### jQuery
版本：`3.2`  
`javascript` 函式庫，實作了許多原生 `javascript` 中複雜的功能，能夠使開發變得更加簡便  
透過 `npm` 管理安裝，或是使用 `laravel/ui` 自動安裝；在此專案中在以後者安裝 `Bootstrap` 安裝時一併安裝  

#### Bootstrap
版本：`4.0.0`  
`Bootstrap` 是一組用於網站和網路應用程式開發的開源前端，能夠使動態網頁和 Web 應用的開發更加容易。  
透過 `npm` 管理安裝，或是使用 `laravel/ui` 自動安裝；在此專案中使用後者方式安裝  
連結：[官方文件](https://getbootstrap.com/docs/4.0/getting-started/introduction/)  
