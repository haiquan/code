using Serilog;
using ILogger = ProductsControllerSample.Databases.Interfaces.ILogger;

namespace ProductsControllerSample.Databases.Repositories
{
  public class Logger : ILogger
  {
    public void Write(string content)
    {
      Log.Debug(content);
    }
  }
}