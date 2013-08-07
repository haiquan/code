# -*- coding: utf-8 -*-
#!/bin/env python
from timeit import Timer

def test():
    sum=0
    for i in range(10000000):
        sum+=i
    print sum
    return sum

if __name__=='__main__':
    t1=Timer("test()","from __main__ import test")
    print t1.timeit(1)
