using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("Row")]
    public class Row
    {
        public Row()
        {
            this.Seats = new HashSet<Seat>();
        }
        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int RowID { get; set; }
        public int RoomID { get; set; }
        public int RowName { get; set; }
        public int Order { get; set; }
        public virtual Room RoomIdNavigation { get; set; }
        public virtual ICollection<Seat> Seats { get; set; }
    }
}
