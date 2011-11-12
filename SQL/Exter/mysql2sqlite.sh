#!/bin/sh 

mysqldump --compact --compatible=ansi --default-character-set=binary -u root --password="NEW_PASS" eduka | 
grep -v ' KEY "' | 
grep -v ' UNIQUE KEY "' | 
perl -e 'local $/;$_=<>;s/,\n\)/\n\)/gs;print "begin;\n";print;print "commit;\n"' |
sed 's/AUTO_INCREMENT//g' |
sed 's/COLLATE utf8_unicode_ci//g' |
sed 's/CHARACTER SET utf8//g' |
perl -pe ' 
if (/^(INSERT.+?)\(/) { 
$a=$1; 
s/\\'\''/'\'\''/g; 
s/\\n/\n/g; 
s/\),\(/\);\n$a\(/g; 
} 
' | 
#cat
sqlite3 output.db
