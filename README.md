pinyinslug
==========

Generate URL-friendly slug, post title. Chinese to Pinyin. Tested on Laravel. 

Due to 'PinyinBundle' in Packagist doesn't work on Laravel, I tried to porting it with Laravel. 

E.g. 
$str = Pinyinslug::ats_pinyin('生活 in Shanghai');

$str will be 'sheng-huo--in-shanghai'.

Then I added Bing Translation function. You need to apply client id from Microsoft. 
