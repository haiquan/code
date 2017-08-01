using System.Reflection;
using System.Web.Http;
using System.Web.Mvc;
using Autofac;
using Autofac.Integration.Mvc;
using Autofac.Integration.WebApi;
using ProductsControllerSample.Controllers;
using ProductsControllerSample.Custom;
using ProductsControllerSample.Databases.Interfaces;
using ProductsControllerSample.Databases.Repositories;

namespace ProductsControllerSample
{
  public class AutofacConfig
  {
    public static void Register()
    {
      var builder = new ContainerBuilder();

      SetupResolveRules(builder);

      //注册所有的Controllers
      builder.RegisterControllers(Assembly.GetExecutingAssembly());
      // OPTIONAL: Register the Autofac filter provider.
      builder.RegisterType<CustomActionFilter>().SingleInstance();
      builder.RegisterFilterProvider();

      //注册所有的ApiControllers
      builder.RegisterApiControllers(Assembly.GetExecutingAssembly());
      // Get your HttpConfiguration.
      var config = GlobalConfiguration.Configuration;
      // OPTIONAL: Register the Autofac filter provider.
      builder.RegisterWebApiFilterProvider(config);

      var container = builder.Build();
      // Set the dependency resolver to be Autofac for MVC
      DependencyResolver.SetResolver(new AutofacDependencyResolver(container));
      // Set the dependency resolver to be Autofac for WebAPI
      config.DependencyResolver = new AutofacWebApiDependencyResolver(container);
    }

    private static void SetupResolveRules(ContainerBuilder builder)
    {
      // mvc
      builder.RegisterType<TodoRepository>().As<ITodoRepository>();

      // web api
      builder.RegisterType<Logger>().As<ILogger>();
      builder.Register(c => new LoggingActionFilter(c.Resolve<ILogger>()))
        .AsWebApiActionFilterFor<ProductsController>()
        .InstancePerRequest();
    }
  }
}