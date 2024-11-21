using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("SeatType")]
    public class SeatType
    {
        public SeatType()
        {
            this.Seats = new HashSet<Seat>();
        }

        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int SeatTypeID { get; set; }

        public string SeatTypeName { get; set; }

        public double PriceMultiplier { get; set; }
        public virtual ICollection<Seat> Seats { get; set; }
    }
}
