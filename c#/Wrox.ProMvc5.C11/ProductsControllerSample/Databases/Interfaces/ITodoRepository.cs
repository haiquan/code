using System.Collections.Generic;
using ProductsControllerSample.Databases.Models;

namespace ProductsControllerSample.Databases.Interfaces
{
  public interface ITodoRepository
  {
    IEnumerable<TodoItem> AllItems { get; }
    void Add(TodoItem item);
    TodoItem GetById(int id);
    bool TryDelete(int id);
  }
}