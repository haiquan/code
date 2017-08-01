using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Diagnostics;
using System.Linq;
using System.Web;
using System.Web.Http;
using System.Web.Mvc;
using Newtonsoft.Json;
using ProductsControllerSample.Custom;
using ProductsControllerSample.Databases.Interfaces;
using ProductsControllerSample.Databases.Models;
using DataContext = ProductsControllerSample.Models.DataContext;
using Product = ProductsControllerSample.Models.Product;

namespace ProductsControllerSample.Controllers
{
  public class ProductsController : ApiController
  {
    private readonly ITodoRepository _repository;

    public ProductsController(ITodoRepository repository)
    {
      _repository = repository;
    }
    private DataContext db = new DataContext();

    // GET api/Products
    public IEnumerable<TodoItem> GetProducts()
    {
      _repository.Add(new TodoItem
      {
        Id = 1,
        Name = "Test"
      });
      //Trace.TraceInformation("Trace {0}", JsonConvert.SerializeObject(_repository.AllItems));
      return _repository.AllItems;
    }

    // GET api/Products/5
    public IHttpActionResult GetProduct(int id)
    {
      Product product = db.Products.Find(id);
      if (product == null)
      {
        return NotFound();
      }
      return Ok(product);
    }

    // PUT api/Products/5
    public IHttpActionResult PutProduct(int id, Product product)
    {
      if (ModelState.IsValid && id == product.ID)
      {
        db.Entry(product).State = EntityState.Modified;
        try
        {
          db.SaveChanges();
        }
        catch (DbUpdateConcurrencyException)
        {
          return NotFound();
        }
        return Ok(product);
      }
      else
      {
        return BadRequest(ModelState);
      }
    }

    // POST api/Products
    public IHttpActionResult PostProduct(Product product)
    {
      if (ModelState.IsValid)
      {
        db.Products.Add(product);
        db.SaveChanges();
        var uri = new Uri(
          Url.Link(
            "DefaultApi",
            new { id = product.ID }));
        return Created(uri, product);
      }
      else
      {
        return BadRequest(ModelState);
      }
    }

    // DELETE api/Products/5
    public IHttpActionResult DeleteProduct(int id)
    {
      Product product = db.Products.Find(id);
      if (product == null)
      {
        return NotFound();
      }
      db.Products.Remove(product);
      try
      {
        db.SaveChanges();
      }
      catch (DbUpdateConcurrencyException)
      {
        return NotFound();
      }
      return Ok(product);
    }

    protected override void Dispose(bool disposing)
    {
      db.Dispose();
      base.Dispose(disposing);
    }
  }

}
