using System.Web.Mvc;
using ProductsControllerSample.Databases.Interfaces;
using ActionFilterAttribute = System.Web.Mvc.ActionFilterAttribute;

namespace ProductsControllerSample.Custom
{
  public class CustomActionFilter : ActionFilterAttribute
  {
    public ILogger Logger { get; set; }

    public override void OnActionExecuting(ActionExecutingContext filterContext)
    {
      Logger.Write(filterContext.ActionDescriptor.ActionName);
    }

    public override void OnActionExecuted(ActionExecutedContext filterContext)
    {
      Logger.Write(filterContext.ActionDescriptor.ActionName);
    }
  }
}