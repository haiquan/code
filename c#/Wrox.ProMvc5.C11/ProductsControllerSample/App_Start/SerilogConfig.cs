using Serilog;

namespace ProductsControllerSample
{
  public class SerilogConfig
  {
    public static void Register()
    {
      Log.Logger = new LoggerConfiguration()
        .ReadFrom.AppSettings()
        .MinimumLevel.Debug()
        //.WriteTo.LiterateConsole()
        .CreateLogger();
    }
  }
}