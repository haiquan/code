using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClrViaC.Chapter5
{
    public class TestType
    {
        public static void P114()
        {
            Int32 v = 5;
            Object o = v;
            v = 123;

            Object o2;

            Stopwatch watch = new Stopwatch();
            watch.Start();
            for (int i = 0; i < 10000; i++)
            {
                o2 = v + ", " + (Int32)o;
                //Trace.TraceInformation(o2.ToString());
            }
            watch.Stop();
            Console.WriteLine("spend time is {0}", watch.ElapsedMilliseconds);

            watch.Start();
            for (int i = 0; i < 10000; i++)
            {
                o2 = v + ", " + o;
                //Trace.TraceInformation(o2.ToString());
            }
            watch.Stop();
            Console.WriteLine("spend time is {0}", watch.ElapsedMilliseconds);
        }
    }
}
