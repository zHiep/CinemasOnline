using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("CouponUser")]
    public class CouponUser
    {
        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int CouponID { get; set; }
        public DateTime GetDate { get; set; }
        public DateTime OutDate { get; set; }
        public bool Status { get; set; }

    }
}
