using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Newtonsoft.Json;
using ProductsControllerSample.Custom;
using ProductsControllerSample.Databases.Interfaces;
using ProductsControllerSample.Databases.Models;

namespace ProductsControllerSample.Controllers
{
  public class HomeController : Controller
  {
    private readonly ITodoRepository _repository;

    public HomeController(ITodoRepository repository)
    {
      _repository = repository;
    }

    [CustomActionFilter]
    public ActionResult Index()
    {
      ViewBag.Title = "Home Page";
      _repository.Add(new TodoItem
      {
        Id = 1,
        Name = "Test"
      });
      Trace.TraceInformation("{0}", JsonConvert.SerializeObject(_repository.AllItems));
      return View();
    }
  }
}
