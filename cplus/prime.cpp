#include <iostream>
#include <cmath>
#include <vector>

using namespace std;

bool is_prime(int num)
{
	int length = sqrt(num);
	int i;
	for(i=2;i<=length;i++)
	{
		if(num%i==0)
			break;
	}
	return (i>length);
}

int main()
{
	int num=0;
	cin>>num;
	int i;
	vector<int> arr;
	for(i=2;i<=num;i++)
	{
		if(is_prime(i))
		{
			cout<<i<<endl;
			arr.push_back(i);
		}
	}

	for(i=0;i<arr.size();i++)
	{
		cout<<arr[i]<<endl;
	}

	vector<int>::iterator p;
	/*
	for(p=arr.begin();p!=arr.end();p++)
	{
		cout<<*p<<endl;
	}
	*/
}
