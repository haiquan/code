//php_walu.hIQ
#ifndef PHP_HAIQUAN_H
#define PHP_HAIQUAN_H

//加载config.h，如果配置了
#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

//加载php头文件
#include "php.h"
#include "php_ini.h"
#include <stdio.h>
#include <sys/time.h>
#include <fcntl.h>
#ifdef HAVE_SYS_FILE_H
#include <sys/file.h>
#endif
#define phpext_haiquan_ptr &haiquan_module_entry
extern zend_module_entry haiquan_module_entry;

#ifdef ZTS
#include "TSRM.h"
#endif

PHP_MINIT_FUNCTION(haiquan);
PHP_MSHUTDOWN_FUNCTION(haiquan);
PHP_RINIT_FUNCTION(haiquan);
PHP_RSHUTDOWN_FUNCTION(haiquan);
PHP_MINFO_FUNCTION(haiquan);

PHP_FUNCTION(haiquan);
PHP_FUNCTION(test);
PHP_FUNCTION(my_type);
#endif
