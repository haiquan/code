// php_haiquan.c

#include "php_haiquan.h"

zend_function_entry haiquan_functions[] = {
    PHP_FE(haiquan, NULL)
    PHP_FE(my_type, NULL)
    PHP_FE(test, NULL)
    {NULL, NULL, NULL}
};

zend_module_entry haiquan_module_entry = {
#if ZEND_MODULE_API_NO >= 20010901
    STANDARD_MODULE_HEADER,
#endif
    "haiquan",
    haiquan_functions,
    PHP_MINIT(haiquan),
    PHP_MSHUTDOWN(haiquan),
    PHP_RINIT(haiquan),
    PHP_RSHUTDOWN(haiquan),
    PHP_MINFO(haiquan),
#if ZEND_MODULE_API_NO >=20010901
    "0.1",
#endif
    STANDARD_MODULE_PROPERTIES
};

#ifdef COMPILE_DL_HAIQUAN
    ZEND_GET_MODULE(haiquan)
#endif

struct timeval start;
//FILE *fp;
PHP_MINIT_FUNCTION(haiquan){
    gettimeofday( &start, NULL );
    php_printf("This is minit function:%d.%d\n<br>",start.tv_sec, start.tv_usec);
    
    FILE *fp;
    fp = fopen("/var/www/logs/tmp.log", "a+");
    //gettimeofday( &start, NULL );
    fprintf(fp, "This is minit function:%d.%d\n",start.tv_sec, start.tv_usec);
    
    time_t lt; 
    lt=time(NULL);
    fprintf(fp, "This is minit function:%s\n",ctime(&lt));
    fclose(fp);
    
    return SUCCESS;
}

PHP_MSHUTDOWN_FUNCTION(haiquan){
    gettimeofday( &start, NULL );
    php_printf("This is mshutdown function:%d.%d\n<br>",start.tv_sec, start.tv_usec);
    
    FILE *fp;
    fp = fopen("/var/www/logs/tmp.log", "a+");
    //gettimeofday( &start, NULL );
    fprintf(fp, "This is mshutdown function:%d.%d\n",start.tv_sec, start.tv_usec);
    
    time_t lt; 
    lt=time(NULL);
    fprintf(fp, "This is mshutdown function:%s\n",ctime(&lt));
    fclose(fp);
    
    return SUCCESS;
}

PHP_RINIT_FUNCTION(haiquan){
    gettimeofday( &start, NULL );
    php_printf("This is rinit function:%d.%d\n<br>",start.tv_sec, start.tv_usec);
    
    FILE *fp;
    fp = fopen("/var/www/logs/tmp.log", "a+");
    //gettimeofday( &start, NULL );
    fprintf(fp, "This is rinit function:%d.%d\n",start.tv_sec, start.tv_usec);
    
    time_t lt; 
    lt=time(NULL);
    fprintf(fp, "This is rinit function:%s\n",ctime(&lt));
    fclose(fp);
    
    return SUCCESS;
}

PHP_RSHUTDOWN_FUNCTION(haiquan){
    gettimeofday( &start, NULL );
    php_printf("This is rshutdown function:%d.%d\n<br>",start.tv_sec, start.tv_usec);
    
    FILE *fp;
    fp = fopen("/var/www/logs/tmp.log", "a+");
    //gettimeofday( &start, NULL );
    fprintf(fp, "This is rshutdown function:%d.%d\n",start.tv_sec, start.tv_usec);

    time_t lt; 
    lt=time(NULL);
    fprintf(fp, "This is rshutdown function:%s\n",ctime(&lt));
    fclose(fp);
    
    return SUCCESS;
}

PHP_MINFO_FUNCTION(haiquan){
    php_info_print_table_start();
    php_info_print_table_header(2, "haiquan support", "enabled");
    php_info_print_table_header(2, "Revision", "$Revision: 0.1 $");
    php_info_print_table_end();
}

PHP_FUNCTION(haiquan){
    php_printf("Hello haiquan!\n");
}

PHP_FUNCTION(test){
    char *name = NULL;
    int name_length = 0;
    int age = 1;

    if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "sl", &name, &name_length, &age) == FAILURE)
    {
        /* code */
        php_printf("error!\n");
        return;
    }

    php_printf("%s is %d years old.", name, age);
}

PHP_FUNCTION(my_type){
    //这个arg间接指向就是我们传给gettype函数的参数。是一个zval**结构
    //所以我们要对他使用__PP后缀的宏。
    zval **arg;

    //这个if的操作主要是让arg指向参数～
    if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "Z", &arg) == FAILURE) {
        return;
    }

    //调用Z_TYPE_PP宏来获取arg指向zval的类型。
    //然后是一个switch结构，RETVAL_STRING宏代表这gettype函数返回的字符串类型的值
    switch (Z_TYPE_PP(arg)) {
        case IS_NULL:
            RETVAL_STRING("NULL", 1);
            break;

        case IS_BOOL:
            RETVAL_STRING("boolean", 1);
            break;

        case IS_LONG:
            RETVAL_STRING("integer", 1);
            break;

        case IS_DOUBLE:
            RETVAL_STRING("double", 1);
            break;
    
        case IS_STRING:
            RETVAL_STRING("string", 1);
            break;
    
        case IS_ARRAY:
            RETVAL_STRING("array", 1);
            break;

        case IS_OBJECT:
            RETVAL_STRING("object", 1);
            break;

        case IS_RESOURCE:
            {
                char *type_name;
                type_name = zend_rsrc_list_get_rsrc_type(Z_LVAL_PP(arg) TSRMLS_CC);
                if (type_name) {
                    RETVAL_STRING("resource", 1);
                    break;
                }
            }

        default:
            RETVAL_STRING("unknown type", 1);
    }
}
