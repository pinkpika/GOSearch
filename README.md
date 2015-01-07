# GOSearch

## 軟體開發
+ 功能：提供一個方便的系統搜尋GO（Gene Ontology）的詞彙。
+ 開發語言：HTML5、CSS3、JavaScript、PHP5.5.0。
+ 開發者工作：  
TaiwanWei-> PHP、Database（Gene Ontology）  
Pinkpika-> HTML、Bootstrap（一種網頁框架）
+ 系統版本：
Version：1.1   
Last Updated：2015-1-3  
GO Database Version：2014-12-22
+ 資料庫：此系統並未用MySQL，而是直接解析XML資料檔，同時利用Hash加速搜尋與對應詞彙。

## 系統安裝說明
1. 安裝XAMPP（此軟體包含Apache與PHP、Perl及MySQL）。
2. 開啟XAMPP的Apache，按Start，同時請關閉有可能佔到同個Port的任何軟體。
3. 把此系統的資料夾（GOSearch）整個放入C:\xampp\htdocs裡。
4. 開啟瀏覽器輸入[http://localhost/GOSearch/index.html](http://localhost/GOSearch/index.html)即可。

## 功能內容敘述
1. Display Data：  
輸入你要顯示的GO Term之編號，起始編號必須小於等於終止編號。  
（注意：此編號為資料庫內的編號，並非GO的ID。）
2. Search One：  
可以利用GO Term的ID或是Name去進行搜尋，找到資料並顯示ID、Name、Namespace、Define、Synonym、Is_a。
3. Parse File：  
輸入一篇文章，即可搜尋出文章內含有的GO Term。  
（但目前只能搜尋出單詞而已，多字組成GO Term的搜尋還未實作。）  
分析後的文章會在GO Term上加上超連結，可以直接點擊得到更詳細的資訊。

## 版權
Bootstrap - Code licensed under [MIT](https://github.com/twbs/bootstrap/blob/master/LICENSE), documentation under CC BY 3.0.  
GO Database - Copyright © 1999-2014 the  [Gene Ontology](http://geneontology.org/page/use-and-license)(CC-BY 4.0).
