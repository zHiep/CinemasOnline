
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("Ticket")]
    public class Ticket
    {
        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int TicketID { get; set; }
        public int ShowTimeID { get; set; }
        public int ComboID { get; set; }
        public string Seat { get; set; }
        public DateTime BookingDate { get; set; }
        public decimal TotalPrice { get; set; }
        public string PaymenMethod { get; set; }
        public string PaymenDate { get; set; }
        public virtual ShowTime ShowTimeIdNavigation { get; set; }
        public virtual Combo ComboIdNavigation { get; set; }
    }
}
