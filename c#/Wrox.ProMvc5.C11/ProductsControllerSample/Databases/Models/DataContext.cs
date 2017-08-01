using System.Data.Entity;

namespace ProductsControllerSample.Databases.Models
{
    public class DataContext : DbContext
    {
        public DbSet<Product> Products { get; set; }
    }
}