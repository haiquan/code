PHP_ARG_ENABLE(haiquan, [Whether to enable the "haiquan" extension], [ enable-haiquan Enable "haiquan" extension support])
if test $PHP_HAIQUAN != "no"; then
    PHP_SUBST(HAIQUAN_SHARED_LIBADD)
    PHP_NEW_EXTENSION(haiquan, haiquan.c, $ext_shared)
fi
