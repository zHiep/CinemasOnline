using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("Banner")]
    public class Banner
    {
        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int BannerID { get; set; }
        public string Title { get; set; }
        public string Image { get; set; }
        public bool IsEnable { get; set; }
    }
}
