#include <stdio.h>
#include <stdlib.h>
#include <errno.h>
#include <string.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <sys/socket.h>
#include <sys/wait.h>
//#include <arpa/inet.h>
#define SERVPORT 3333    /*服务器监听端口号 */
#define BACKLOG 10    /* 最大同时连接请求数 */

main()
{
    int sock_fd, client_fd, on, ret;   /*sock_fd：监听socket；client_fd：数据传输socket */
    int sin_size;
    struct sockaddr_in my_addr;    /* 本机地址信息 */
    struct sockaddr_in remote_addr;    /* 客户端地址信息 */
    if((sock_fd = socket(AF_INET, SOCK_STREAM, 0)) == -1) {
        perror("socket创建出错！");
        exit(1);
    }
    /* Enable address reuse */
    on = 1;
    ret = setsockopt( sock_fd, SOL_SOCKET, SO_REUSEADDR, &on, sizeof(on) );

    my_addr.sin_family=AF_INET;
    my_addr.sin_port=htons(SERVPORT);
    my_addr.sin_addr.s_addr = INADDR_ANY;
    bzero(&(my_addr.sin_zero),8);
    if(bind(sock_fd, (struct sockaddr *)&my_addr, sizeof(struct sockaddr)) == -1) {
        perror("bind出错！");
        exit(1);
    }
    if(listen(sock_fd, BACKLOG) == -1) {
        perror("listen出错！");
        exit(1);
    }
    while(1) {
        sin_size = sizeof(struct sockaddr);
        if((client_fd = accept(sock_fd, (struct sockaddr *)&remote_addr, &sin_size)) == -1) {
            perror("accept出错");
            continue;
        }
        printf("received a connection from %s\n", inet_ntop(remote_addr.sin_addr));
        if(!fork()) {    /* 子进程代码段 */
            if(send(client_fd, "Hello, you are connected!\n", 26, 0) == -1) {
                perror("send出错！");
            }
            close(client_fd);
            exit(0);
        }
        close(client_fd);
    }
}
