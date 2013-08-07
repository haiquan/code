#include <iostream>
#include <stdlib.h>
#include <ctime>
using namespace std;

clock_t start, end;

int main(){
    long sum = 0;
    int num = 10000000;
    start = clock();
    for(int i=1;i<num;i++){
        sum+=i;
    }
    end = clock();
    double durtime = (double)(end-start)/CLOCKS_PER_SEC;
    //printf('%f', durtime);
    cout<<durtime<<endl;
    cout<<sum<<endl;
}
