#include <iostream>
#include <cmath>
#include <ctime>
#include <stdlib.h>
using namespace std;

bool is_prime(int num)
{
    int length = sqrt(num);
    int i;
    for(i=2;i<=length;i++)
        if(num%i == 0)break;
    return (i>length);
}

void find_all_prime(int num)
{
    cout<<"find_all_prime"<<endl;
    clock_t start, end;
    start = clock();
    int i;
    int sum = 0;
    for(i=2;i<num;i++)
    {
        if(is_prime(i))
            sum++;//cout<<i<<endl;
    }
    end = clock();
    double durtime = (double)(end-start)/CLOCKS_PER_SEC;
    cout<< start<< endl;
    cout<< end<< endl;
    cout<< durtime<< endl;
    cout<<sum<<endl;
}

void find_all_prime2(int num)
{
    cout<<"find_all_prime2"<<endl;
    int* arr = new int[num+1];
    int i;
    clock_t start, end;
    start = clock();
    for(i=0;i<=num;i++)
    {
        arr[i] = 0;
    }
    arr[0]=arr[1] = 1;
    for(i=2;i<=num;i++)
    {
        int index=2;
        while(i*index<=num)arr[i*index++]=1;
    }
    int sum = 0;
    for(i=2;i<=num;i++)
    {
        if(arr[i] == 0)
            sum++;//cout<<i<<endl;
    }
    //usleep(10000);
    end = clock();
    double durtime = (double)(end-start)/CLOCKS_PER_SEC;
    cout<< start<< endl;
    cout<< end<< endl;
    cout<< durtime<< endl;
    cout<<sum<<endl;
    delete(arr);
}


int main()
{
    /*
    unsigned int max = pow(2,32)-1;
    cout<<max<<endl;

    unsigned int max1 = pow(2,32);
    cout<<max1<<endl;
    
    int max2 = pow(2,31)-1;
    cout<<max2<<endl;
    
    int max3 = pow(2,31);
    cout<<max3<<endl;
    */
    int num = 1000000;
    cin>>num;
    find_all_prime(num);
    find_all_prime2(num);
}
