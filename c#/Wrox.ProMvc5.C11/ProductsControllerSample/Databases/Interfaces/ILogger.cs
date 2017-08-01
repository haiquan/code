using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace ProductsControllerSample.Databases.Interfaces
{
  public interface ILogger
  {
    void Write(string content);
  }
}