using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("Combo")]
    public class Combo
    {
        public Combo()
        {
            this.Tickets = new HashSet<Ticket>();
        }

        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int ComboID { get; set; }
        public string ComboName { get; set; }
        public string Image { get; set; }
        public string Description { get; set; }
        public string Price { get; set; }
        public string Quantity { get; set; }
        public bool Condition { get; set; }
        public bool Status { get; set; }
        public virtual ICollection<Ticket> Tickets { get; set; }
    }
}
